(function() {

    var step = 0;
    var container = document.querySelector("div.steps");
    var prevBtn = document.querySelector("[data-load-previous]");
    var nextBtn = document.querySelector("[data-load-next]");

    // Set default page as stap 0
        ajaxLoad("GET","stap-0.html", function(response) {
            container.innerHTML = response;
        });

    // Set default button status
        setBtnStatus();

    nextBtn.addEventListener("click", function(){
        switchPage("next");
    });

    prevBtn.addEventListener("click", function(){
        switchPage("previous");
    });

    // Set current page, increase if next button is clicked, decrease if previous button is clicked.

    function switchPage(type) {
        if (type == "next") {
            step++;
        } else if (type = "previous") {
            step--;
        }

        ajaxLoad("GET","stap-" + step + ".html", function(response) {
            container.innerHTML = response;

            // If elements exist, enable event listeners

            if (typeof(document.querySelector("#folder")) != 'undefined' && document.querySelector("#folder") != null) {
                document.querySelector("#folder").addEventListener("keyup", function(){
                    setCodeBox(document.getElementById("zoekFolderCommando"), this.value);
                });
            }

            if (typeof(document.querySelector("#cloneUrl")) != 'undefined' && document.querySelector("#cloneUrl") != null) {
                document.querySelector("#cloneUrl").addEventListener("keyup", function(){
                    setCodeBox(document.getElementById("cloneCommand"), "git clone " + this.value);
                });
            }

            if (typeof(document.querySelector("#commitComment")) != 'undefined' && document.querySelector("#commitComment") != null) {
                document.querySelector("#commitComment").addEventListener("keyup", function(){
                    setCodeBox(document.getElementById("commitCommand"), 'git commit -a -m "' + this.value + '"');
                });
            }

            // Codebox functions

                function setCodeBox(element, value) {
                    element.innerHTML = value;
                }

                var codeFields = document.getElementsByTagName("code");

                for(i = 0; i < codeFields.length; i++) {
                    codeFields[i].addEventListener("click",copyToClipboard);
                }

                function copyToClipboard() {
                    console.log(this.innerHTML);
                    document.querySelector(".temp_copy").value = this.innerHTML;
                    document.querySelector(".temp_copy").select();
                    document.execCommand("copy");
                    alert("Copied to clipboard!");
                }

        });

        setBtnStatus();
    }

    // Generic ajax function

    function ajaxLoad(type, url, callback) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                callback(this.responseText);
            }
        };

        xhr.open(type, url, true);
        xhr.send();
    }


    function setBtnStatus() {
        if (step === 0) {
            prevBtn.disabled = true;
            nextBtn.disabled = false;
        } else if (step === 4) {
            nextBtn.disabled = true;
            prevBtn.disabled = false;
        } else {
            nextBtn.disabled = false;
            prevBtn.disabled = false;
        }
    }



})();
