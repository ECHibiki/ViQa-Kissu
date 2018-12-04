/*
 * expand-audio.js
 * Code lent from public domain js/expand-webm.js and js/webm-settings.js
 * Usage:
 *   $config['additional_javascript'][] = 'js/expand-audio.js';
 *
*/

if (typeof _ == 'undefined') {
  var _ = function(a) { return a; };
}

// Default settings
var defaultSettings = {
    "audioexpand": true,
    "audiohover": false,
    "audiovolume": 1.0
};

// Non-persistent settings for when localStorage is absent/disabled
var tempSettings = {};

// Scripts obtain settings by calling this function
function setting(name) {
    if (localStorage) {
        if (localStorage[name] === undefined) return defaultSettings[name];
        return JSON.parse(localStorage[name]);
    } else {
        if (tempSettings[name] === undefined) return defaultSettings[name];
        return tempSettings[name];
    }
}

// Settings should be changed with this function
function changeSetting(name, value) {
    if (localStorage) {
        localStorage[name] = JSON.stringify(value);
    } else {
        tempSettings[name] = value;
    }
}

// Create settings menu
var settingsMenu = document.createElement("div");
var prefix = "", suffix = "", style = "";
if (window.Options) {
  var tab = Options.add_tab("audio", "volume-up", _("Audio"));
  $(settingsMenu).appendTo(tab.content);
}
else {
  prefix = '<a class="unimportant" href="javascript:void(0)">'+_('Audio Settings')+'</a>';
  settingsMenu.style.textAlign = "right";
  settingsMenu.style.background = "inherit";
  suffix = '</div>';
  style = 'display: none; text-align: left; position: absolute; right: 1em; margin-left: -999em; margin-top: -1px; padding-top: 1px; background: inherit;';
}

settingsMenu.innerHTML = prefix
    + '<div style="'+style+'">'
    + '<label><input type="checkbox" name="audioexpand">'+_('Expand audio inline')+'</label><br>'
    + '<label><input type="checkbox" name="audiohover">'+_('Play audio on hover')+'</label><br>'
    + '<label><input type="range" name="audiovolume" min="0" max="1" step="0.01" style="width: 4em; height: 1ex; vertical-align: middle; margin: 0px;">'+_('Default volume')+'</label><br>'
    + suffix;

function refreshSettings() {
    var settingsItems = settingsMenu.getElementsByTagName("input");
    for (var i = 0; i < settingsItems.length; i++) {
        var control = settingsItems[i];
        if (control.type == "checkbox") {
            control.checked = setting(control.name);
        } else if (control.type == "range") {
            control.value = setting(control.name);
        }
    }
}

function setupControl(control) {
    if (control.addEventListener) control.addEventListener("change", function(e) {
        if (control.type == "checkbox") {
            changeSetting(control.name, control.checked);
        } else if (control.type == "range") {
            changeSetting(control.name, control.value);
        }
    }, false);
}

refreshSettings();
var settingsItems = settingsMenu.getElementsByTagName("input");
for (var i = 0; i < settingsItems.length; i++) {
    setupControl(settingsItems[i]);
}

if (settingsMenu.addEventListener && !window.Options) {
    settingsMenu.addEventListener("mouseover", function(e) {
        refreshSettings();
        settingsMenu.getElementsByTagName("a")[0].style.fontWeight = "bold";
        settingsMenu.getElementsByTagName("div")[0].style.display = "block";
    }, false);
    settingsMenu.addEventListener("mouseout", function(e) {
        settingsMenu.getElementsByTagName("a")[0].style.fontWeight = "normal";
        settingsMenu.getElementsByTagName("div")[0].style.display = "none";
    }, false);
}

//------------

function setupAudio(thumb, url) {
    if (thumb.audioAlreadySetUp) return;
    thumb.audioAlreadySetUp = true;

    var audio = null;
    var audioContainer, audioHide;
    var expanded = false;
    var hovering = false;
    var loop = true;
    var loopControls = [document.createElement("span"), document.createElement("span")];
    var fileInfo = thumb.parentNode.querySelector(".fileinfo");
    var mouseDown = false;

    function unexpand() {
        if (expanded) {
            expanded = false;
            if (audio.pause) audio.pause();
            audioContainer.style.display = "none";
            thumb.style.display = "inline";
            audio.style.maxWidth = "inherit";
            audio.style.maxHeight = "inherit";
        }
    }

    function unhover() {
        if (hovering) {
            hovering = false;
            if (audio.pause) audio.pause();
            audioContainer.style.display = "none";
            audio.style.maxWidth = "inherit";
            audio.style.maxHeight = "inherit";
        }
    }

    // Create audio element if does not exist yet
    function getAudio() {
        if (audio == null) {
            audio = document.createElement("video");
            audio.src = url;
            audio.loop = loop;
            audio.innerText = _("Your browser does not support HTML5 video.");

            audioHide = document.createElement("img");
            audioHide.src = configRoot + "static/collapse.gif";
            audioHide.alt = "[ - ]";
            audioHide.title = "Collapse audio";
            audioHide.style.marginLeft = "-15px";
            audioHide.style.cssFloat = "left";
            audioHide.addEventListener("click", unexpand, false);

            audioContainer = document.createElement("div");
            audioContainer.style.paddingLeft = "15px";
            audioContainer.style.display = "none";
            audioContainer.appendChild(audioHide);
            audioContainer.appendChild(audio);
            thumb.parentNode.insertBefore(audioContainer, thumb.nextSibling);

            // Dragging to the left collapses the audio
            audio.addEventListener("mousedown", function(e) {
                if (e.button == 0) mouseDown = true;
            }, false);
            audio.addEventListener("mouseup", function(e) {
                if (e.button == 0) mouseDown = false;
            }, false);
            audio.addEventListener("mouseenter", function(e) {
                mouseDown = false;
            }, false);
            audio.addEventListener("mouseout", function(e) {
                if (mouseDown && e.clientX - audio.getBoundingClientRect().left <= 0) {
                    unexpand();
                }
                mouseDown = false;
            }, false);
        }
    }

    // Clicking on thumbnail expands audio
    thumb.addEventListener("click", function(e) {
        if (setting("audioexpand") && !e.shiftKey && !e.ctrlKey && !e.altKey && !e.metaKey) {
            getAudio();
            expanded = true;
            hovering = false;

            audio.style.position = "static";
            audio.style.pointerEvents = "inherit";
            audio.style.display = "inline";
            audioHide.style.display = "inline";
            audioContainer.style.display = "block";
            audioContainer.style.position = "static";
            audio.parentNode.parentNode.removeAttribute('style');
            thumb.style.display = "none";

            audio.muted = (setting("audiovolume") == 0);
            audio.volume = setting("audiovolume");
            audio.controls = true;
            if (audio.readyState == 0) {
                audio.addEventListener("loadedmetadata", expand2, false);
            } else {
                setTimeout(expand2, 0);
            }
            audio.play();
            e.preventDefault();
        }
    }, false);

    function expand2() {
        audio.style.maxWidth = "100%";
        audio.style.maxHeight = window.innerHeight + "px";
        var bottom = audio.getBoundingClientRect().bottom;
        if (bottom > window.innerHeight) {
            window.scrollBy(0, bottom - window.innerHeight);
        }
        // work around Firefox volume control bug
        audio.volume = Math.max(setting("audiovolume") - 0.001, 0);
        audio.volume = setting("audiovolume");
    }

    // Hovering over thumbnail displays audio
    thumb.addEventListener("mouseover", function(e) {
        if (setting("audiohover")) {
            getAudio();
            expanded = false;
            hovering = true;

            var docRight = document.documentElement.getBoundingClientRect().right;
            var thumbRight = thumb.querySelector("img, audio").getBoundingClientRect().right;
            var maxWidth = docRight - thumbRight - 20;
            if (maxWidth < 250) maxWidth = 250;

            audio.style.position = "fixed";
            audio.style.right = "0px";
            audio.style.top = "0px";
            var docRight = document.documentElement.getBoundingClientRect().right;
            var thumbRight = thumb.querySelector("img, audio").getBoundingClientRect().right;
            audio.style.maxWidth = maxWidth + "px";
            audio.style.maxHeight = "100%";
            audio.style.pointerEvents = "none";

            audio.style.display = "inline";
            audioHide.style.display = "none";
            audioContainer.style.display = "inline";
            audioContainer.style.position = "fixed";

            audio.muted = (setting("audiovolume") == 0);
            audio.volume = setting("audiovolume");
            audio.controls = false;
            audio.play();
        }
    }, false);

    thumb.addEventListener("mouseout", unhover, false);

    // Scroll wheel on thumbnail adjusts default volume
    thumb.addEventListener("wheel", function(e) {
        if (setting("audiohover")) {
            var volume = setting("audiovolume");
            if (e.deltaY > 0) volume -= 0.1;
            if (e.deltaY < 0) volume += 0.1;
            if (volume < 0) volume = 0;
            if (volume > 1) volume = 1;
            if (audio != null) {
                audio.muted = (volume == 0);
                audio.volume = volume;
            }
            changeSetting("audiovolume", volume);
            e.preventDefault();
        }
    }, false);

    // [play once] vs [loop] controls
    function setupLoopControl(i) {
        loopControls[i].addEventListener("click", function(e) {
            loop = (i != 0);
            thumb.href = thumb.href.replace(/([\?&])loop=\d+/, "$1loop=" + i);
            if (audio != null) {
                audio.loop = loop;
                if (loop && audio.currentTime >= audio.duration) {
                    audio.currentTime = 0;
                }
            }
            loopControls[i].style.fontWeight = "bold";
            loopControls[1-i].style.fontWeight = "inherit";
        }, false);
    }

    loopControls[0].textContent = _("[play once]");
    loopControls[1].textContent = _("[loop]");
    loopControls[1].style.fontWeight = "bold";
    for (var i = 0; i < 2; i++) {
        setupLoopControl(i);
        loopControls[i].style.whiteSpace = "nowrap";
        fileInfo.appendChild(document.createTextNode(" "));
        fileInfo.appendChild(loopControls[i]);
    }
}

function setupAudioIn(element) {
    var thumbs = element.querySelectorAll("a.file");
    for (var i = 0; i < thumbs.length; i++) {
        if (/\.mp3$|\.flac$/.test(thumbs[i].pathname)) {
            setupAudio(thumbs[i], thumbs[i].href);
        } else {
            var m = thumbs[i].search.match(/\bv=([^&]*)/);
            if (m != null) {
                var url = decodeURIComponent(m[1]);
                if (/\.mp3$|\.flac$/.test(url)) setupAudio(thumbs[i], url);
            }
        }
    }
}

onready(function(){
    // Insert menu from settings.js
    if (typeof settingsMenu != "undefined" && typeof Options == "undefined")
      document.body.insertBefore(settingsMenu, document.getElementsByTagName("hr")[0]);

    // Setup Javascript events for audios in document now
    setupAudioIn(document);

    // Setup Javascript events for audios added by updater
    if (window.MutationObserver) {
        var observer = new MutationObserver(function(mutations) {
            for (var i = 0; i < mutations.length; i++) {
                var additions = mutations[i].addedNodes;
                if (additions == null) continue;
                for (var j = 0; j < additions.length; j++) {
                    var node = additions[j];
                    if (node.nodeType == 1) {
                        setupAudioIn(node);
                    }
                }
            }
        });
        observer.observe(document.body, {childList: true, subtree: true});
    }
});

