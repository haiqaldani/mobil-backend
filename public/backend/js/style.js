// FilePond.registerPlugin(
//     // encodes the file as base64 data
//     FilePondPluginFileEncode,

//     // validates the size of the file
//     FilePondPluginFileValidateSize,

//     // corrects mobile image orientation
//     FilePondPluginImageExifOrientation,

//     // previews dropped images
//     FilePondPluginImagePreview

//     // FilePondPluginImageEdit
// );

// // Select the file input and use create() to turn it into a pond
// FilePond.create(document.querySelector(".file"));

$("#chooseFile").bind("change", function() {
    var filename = $("#chooseFile").val();
    if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass("active");
        $("#noFile").text("No file chosen...");
    } else {
        $(".file-upload").addClass("active");
        $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
    }
});
