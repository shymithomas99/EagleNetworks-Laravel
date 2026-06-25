/*! Image Uploader - v1.0.0 - 15/07/2019*/

(function ($) {
    $.fn.imageUploader = function (options) {
        let defaults = { preloaded: [], imagesInputName: "gallery_images", preloadedInputName: "preloaded", label: "Drag & Drop files here or click to browse", uploadUrl: '/admin/upload-image', deleteUrl: '/admin/delete-image', id: 0 };
        let plugin = this;
        plugin.settings = {};
        plugin.init = function () {
            plugin.settings = $.extend(plugin.settings, defaults, options);
            plugin.each(function (i, wrapper) {
                let $container = createContainer();
                $(wrapper).append($container);
                $container.on("dragover", fileDragHover.bind($container));
                $container.on("dragleave", fileDragHover.bind($container));
                $container.on("drop", fileSelectHandler.bind($container));
                if (plugin.settings.preloaded.length) {
                    $container.addClass("has-files");
                    let $uploadedContainer = $container.find(".uploaded");
                    for (let i = 0; i < plugin.settings.preloaded.length; i++) {
                        $uploadedContainer.append(createImg(plugin.settings.preloaded[i].src, plugin.settings.preloaded[i].id,1));
                    }
                }
            });
        };
        let dataTransfer = new DataTransfer();
        let createContainer = function () {
            let $container = $("<div>", { class: "image-uploader" }),
                $input = $("<input>", { type: "file", id: plugin.settings.imagesInputName + "-" + random(), name: plugin.settings.imagesInputName + "[]", multiple: "" }).appendTo($container),
                $uploadedContainer = $("<div>", { class: "uploaded" }).appendTo($container),
                $textContainer = $("<div>", { class: "upload-text" }).appendTo($container),
                $i = $("<i>", { class: "fa fa-upload" }).appendTo($textContainer),
                $span = $("<span>", { text: plugin.settings.label }).appendTo($textContainer);
            $container.on("click", function (e) {
                prevent(e);
                $input.trigger("click");
            });
            $input.on("click", function (e) {
                e.stopPropagation();
            });
            $input.on("change", fileSelectHandler.bind($container));
            return $container;
        };
        let prevent = function (e) {
            e.preventDefault();
            e.stopPropagation();
        };
        // Helper to check if uploader is empty and reset state
        let checkEmptyUploader = function ($uploader) {
            if ($uploader.find('.uploaded-image').length === 0) {
                $uploader.removeClass("has-files");
            }
        };
        let createImg = function (src, id,type='') {
            let $container = $("<div>", { class: "uploaded-image" }),
                $img = $("<img>", { src: src }).appendTo($container),
                $button = null,
                $progressBar = $("<div>", { class: "progress-bar" }).appendTo($container).hide();
            if (plugin.settings.preloaded.length && type == 1) {
                $button = $("<button>", { class: "delete-image" }).appendTo($container),
                $i = $("<i>", { class: "fa fa-trash" }).appendTo($button);
                $container.attr("data-preloaded", !0);
                let $preloaded = $("<input>", { type: "hidden", name: plugin.settings.preloadedInputName + "[]", value: id });
                $preloaded.attr("data-delete_url",plugin.settings.deleteUrl);
                $preloaded.attr("data-type",type);
                $preloaded.appendTo($container);
            } else {
                $container.attr("data-index", id);
                let $preloaded = $("<input>", { type: "hidden", name: "new[]" });
                $preloaded.attr("data-delete_url",plugin.settings.deleteUrl);
                $preloaded.attr("data-type",type);
                $preloaded.appendTo($container);
            }
            
            $container.on("click", function (e) {
                prevent(e);
            });
            
            if($button) {
                $button.on("click", function (e) {
                    prevent(e);
                    let $uploader = $container.closest('.image-uploader');
                    if ($container.data("preloaded")) {
                        var deleteUrl = $container.find('input').data('delete_url');
                        var imageId = $container.find('input').val();
    
                        $.ajax({
                            url: deleteUrl,
                            type: 'POST',
                            data: {
                                id: imageId,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                if (response.success) {
                                    toastr.remove();
                                    toastr.success("Image deleted successfully", "Deleted");
                                    $container.remove();
                                    checkEmptyUploader($uploader);
                                } else {
                                    toastr.remove();
                                    toastr.error("Failed to delete image", "Error");
                                }
                            },
                            error: function (err) {
                                toastr.remove();
                                toastr.error("Error occurred while deleting image", "Error");
                            }
                        });
                    } else {
                        $container.remove();
                        checkEmptyUploader($uploader);
                    }
                });
            }
            return $container;
        };
        let fileDragHover = function (e) {
            prevent(e);
            if (e.type === "dragover") {
                $(this).addClass("drag-over");
            } else {
                $(this).removeClass("drag-over");
            }
        };
        let fileSelectHandler = function (e) {
            prevent(e);
            let $container = $(this);
            $container.removeClass("drag-over");
            let files = e.target.files || e.originalEvent.dataTransfer.files;
            setPreview($container, files);
        };
        let setPreview = function ($container, files) {
            $container.addClass("has-files");
            let $uploadedContainer = $container.find(".uploaded"),
                $input = $container.find('input[type="file"]');
            $(files).each(function (i, file) {
                dataTransfer.items.add(file);
                let $newImage = createImg(URL.createObjectURL(file), dataTransfer.items.length - 1, 0);
                $newImage.find(".progress-bar").show();
                $uploadedContainer.append($newImage);
                uploadImage(file, $newImage.find(".progress-bar"));
                
            });
            $input.prop("files", dataTransfer.files);
        };
        let uploadImage = function (file, $progressBar) {
            let formData = new FormData();
            formData.append('id', plugin.settings.id);
            formData.append('file', file);
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            let $uploadedImageContainer = $progressBar.closest('.uploaded-image');
            $uploadedImageContainer.find('img').css('filter', 'blur(4px)');
            
            $.ajax({
                url: plugin.settings.uploadUrl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                xhr: function () {
                    let xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (e) {
                        if (e.lengthComputable) {
                            let percent = (e.loaded / e.total) * 100;
                            $progressBar.css('width', percent + '%');
                        }
                    }, false);
                    return xhr;
                },
                success: function (data) {
                    toastr.remove();
                    toastr.success("Image uploaded successfully!", "Uploaded");
                    $progressBar.css('width', '100%');
                    $progressBar.css('background-color', '#4caf50');
                    $uploadedImageContainer.find('img').css('filter', '');
                    
                    let image_id = data.image_id;
                    $uploadedImageContainer.find('input[type="hidden"]').val(image_id);
                    
                    $button = $("<button>", { class: "delete-image" }).appendTo($uploadedImageContainer),
                    $i = $("<i>", { class: "fa fa-trash" }).appendTo($button);
                    
                    $button.on("click", function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        $container = $(this).closest('.uploaded-image');
                        let $uploader = $container.closest('.image-uploader');
                        
                        var deleteUrl = plugin.settings.deleteUrl;
                        var imageId = $container.find('input[type="hidden"]').val();
                        
                        $.ajax({
                            url: deleteUrl,
                            type: 'POST',
                            data: {
                                id: imageId,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                if (response.success) {
                                    toastr.remove();
                                    toastr.success("Image deleted successfully", "Deleted");
                                    $container.remove();
                                    checkEmptyUploader($uploader);
                                } else {
                                    toastr.remove();
                                    toastr.error("Failed to delete image", "Error");
                                }
                            },
                            error: function (err) {
                                toastr.remove();
                                toastr.error("Error occurred while deleting image", "Error");
                            }
                        });
                    });
                },
                error: function (xhr, status, error) {
                    toastr.remove();
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        let errorMessages = '';
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            errorMessages += value + '<br>';
                        });
                        toastr.error(errorMessages, "Validation Error");
                    } else {
                        toastr.error("Failed to upload image", "Error");
                    }
                    $progressBar.css('background-color', 'red');
                    
                    $button = $("<button>", { class: "delete-image" }).appendTo($uploadedImageContainer),
                    $i = $("<i>", { class: "fa fa-trash" }).appendTo($button);
                
                    $button.on("click", function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        $container = $(this).closest('.uploaded-image');
                        let $uploader = $container.closest('.image-uploader');
                        
                        $container.remove();
                        checkEmptyUploader($uploader);
                    });
                }
            });
            
            
        };
        
        let random = function () {
            return Date.now() + Math.floor(Math.random() * 100 + 1);
        };
        this.init();
        return this;
    };
})(jQuery);
