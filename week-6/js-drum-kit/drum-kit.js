(function(){

    var keys;
    keys = document.querySelectorAll("[data-key]");

    keys.forEach(function(key){
        key.addEventListener("click", getKey);
    });

    document.addEventListener("keydown", getKey);


    // Get key from event
    function getKey(event) {
        var type, key;

        type = event.type;

        if (type === "keydown") {
            key = parseInt(event.keyCode);
            playSound(key);
        } else if (type === "click") {
            key = this.dataset.key;
            playSound(key);
        }


    }


    var sounds;
    sounds = document.querySelectorAll("audio");

    // Play sound if supplied key matches key of sound
    function playSound(key) {
        sounds.forEach(function(sound){
            if (key == sound.dataset.key) {
                toggleStyle(key);
                sound.play();
            }
        });
    }

    // Toggle style if sound is played
    function toggleStyle(pressedKey) {
        keys.forEach(function(key){
            if (pressedKey == key.dataset.key) {
                key.classList.toggle("playing");
                setTimeout(function(){
                    key.classList.toggle("playing");
                }, 200);
            }
        });
    }

})();
