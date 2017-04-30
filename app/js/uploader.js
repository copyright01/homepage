(function () {
    var uploader = {

        addHover: function () {
            this.dropZone.classList.add("dragOver");
        },

        removeHover: function () {
            this.dropZone.classList.remove("dragOver");
        },

        cancelDefault: function (e) {
            e.preventDefault();
            return false;
        },

        handleDrop: function (e) {
            e.preventDefault();
            e.stopPropagation();

            var files = e.dataTransfer.files;
            [].forEach.call(files, function (file) {
                this.generateThumbnail(file);
                this.addToUploadList(file);
            }.bind(this));

            this.removeHover();
        },

        generateThumbnail: function (file) {
            var reader = new FileReader(),
                    img = new Image();

            reader.onload = function () {
                img.src = reader.result;
                img.alt = file.name + ' ' + file.size / 1000 + 'KB';
            }
            reader.readAsDataURL(file);
            this.filesContainer.appendChild(img);
        },

        addToUploadList: function (file) {
            this.formData.append("files[]", file);
            this.filesAdded++;
        },

        sendFiles: function () {
            if (this.filesAdded == 0) {
                return;
            }
            this.sendButton.onclick = null;
            this.sendButton.setAttribute("disabled", "disabled");

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax.php?action=upload", true);
            xhr.onload = function (e) {
                if (e.target.status != 200) {
                     this.setStatus(true, "Wystąpił błąd!");
                }
                
                var responseObject = JSON.parse(e.target.responseText);
                this.setStatus(responseObject.error, responseObject.message);
            }.bind(this);
            
            xhr.onprogress = this.updateProgress.bind(this);
            xhr.send(this.formData);

        },
        
        updateProgress: function(e){
            if(e.lengthComputable){
                var percentLoaderd = (e.loaded/e.total) * 100;
            }
            
            this.progressBar.style.width = percentLoaderd + "%";
            this.progressBar.querySelector("span").innerHTML = percentLoaderd + "%";
        },
        
        setStatus: function(isError, message){
            this.status.style.display = 'block';
            this.status.innerHTML = message;
            if(isError){
                this.status.classList.add("alert");
            }else{
                this.status.classList.add("success");
            }
        },

        init: function () {
            if (!"draggable" in document.createElement("span") || !window.FileReader) {
                return;
            }

            this.dropZone = document.querySelector("#dropZone");
            this.filesContainer = document.querySelector("#filesContainer");
            this.sendButton = document.querySelector("#sendUpload");
            this.status = document.querySelector("#statusUpload");
            this.progressBar = document.querySelector("#progressBar");

            this.dropZone.ondragenter = this.addHover.bind(this);
            this.dropZone.ondragleave = this.removeHover.bind(this);
            this.dropZone.ondragover = this.cancelDefault;
            this.dropZone.ondrop = this.handleDrop.bind(this);

            this.filesAdded = 0;
            this.formData = new FormData();
            this.sendButton.onclick = this.sendFiles.bind(this);

        }
    };


    uploader.init();
})();