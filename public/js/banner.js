// banner.js
function addBannerInput() {
    if (!document.getElementById("banner-container")) {
        var bannerContainer = document.createElement("div");
        bannerContainer.id = "banner-container";
        bannerContainer.className = "ms-5 ps-5";
        document.body.appendChild(bannerContainer);
    }
    var inputGroup = document.createElement("div");
    inputGroup.className = "input-group mt-5 ms-5 ps-5  mx-2";

    var imagePreview = document.createElement("div");
    imagePreview.className = "ms-5 ps-5";

    var fileLabel = document.createElement("label");
    fileLabel.className = "input-group-text m-2 p-2 px-3 fs-4";
    fileLabel.setAttribute("for", "image");
    fileLabel.textContent = "ファイルを選択";

    var inputFile = document.createElement("input");
    inputFile.type = "file";
    inputFile.id = "image";
    inputFile.name = "images";
    inputFile.style.display = "none";

    inputGroup.appendChild(imagePreview);
    inputGroup.appendChild(fileLabel);
    inputGroup.appendChild(inputFile);

    document.getElementById("banner-container").appendChild(inputGroup);
}
