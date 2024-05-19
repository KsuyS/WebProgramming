document.addEventListener("DOMContentLoaded", () => {
    const postData =
    {
        title: '',
        subtitle: '',
        authorName: '',
        authorPhoto: '',
        datePost: '',
        mainPostImage: '',
        postImage: '',
        content: '',
    }

    const titleInput = document.getElementById('title_input');
    const subtitleInput = document.getElementById('subtitle_input');
    const authorInput = document.getElementById('author_input');
    const authorPhotoInput = document.getElementById('author_photo_input');
    const datePostInput = document.getElementById('date_post_input');
    const mainpostImageInput = document.getElementById('main_post_image_input');
    const postImageInput = document.getElementById('post_image_input');
    const contentInput = document.getElementById('content_input');


    function onTitleInputChange(event) {
        postData.title = event.target.value;
        invalidateTitlePreview()
    }
    function onSubtitleInputChange(event) {
        postData.subtitle = event.target.value;
        invalidateSubtitlePreview()
    }
    function onAuthorInputChange(event) {
        postData.authorName = event.target.value;
        invalidateAuthorPreview()
    }

    function onAuthorPhotoInputChange(event) {
        const file = event.target.files[0];
        readFileAsBase64(file, (result) => {
            postData.authorPhoto = result;
            invalidateAuthorPhotoPreview()
        });
        document.querySelectorAll('.info__upload-new-button')[0].classList.add('info__upload-new-button_download')
        document.querySelectorAll('.info__remove-button')[0].classList.add('info__remove-button_download')
    }

    function onDatePostInputChange(event) {
        postData.datePost = event.target.value;
        invalidateDatePreview()
    }

    function onPostImageInputChange(event) {
        const file = event.target.files[0];
        readFileAsBase64(file, (result) => {
            postData.postImage = result;
            invalidateImagePreview()
        });
        document.querySelectorAll('.info__upload-new-button')[2].classList.add('info__upload-new-button_download')
        document.querySelectorAll('.info__remove-button')[2].classList.add('info__remove-button_download')
        document.querySelectorAll('.indication-for-image')[1].classList.add('indication-for-image_download')
    }

    function onMainPostImageInputChange(event) {
        const file = event.target.files[0];
        readFileAsBase64(file, (result) => {
            postData.mainPostImage = result;
            invalidateMainImagePreview()
        });

        document.querySelectorAll('.info__upload-new-button')[1].classList.add('info__upload-new-button_download')
        document.querySelectorAll('.info__remove-button')[1].classList.add('info__remove-button_download')
        document.querySelectorAll('.indication-for-image')[0].classList.add('indication-for-image_download')
    }

    function readFileAsBase64(file, onload) {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            onload(reader.result);
        }, false,);
        reader.readAsDataURL(file);
    }

    function onContentInputChange(event) {
        postData.content = event.target.value;
    }


    function validation(form) {
        function removeError(input) {
            const parent = input.parentNode
            if (input.classList.contains('form-error')) {
                input.classList.remove('form-error')
                parent.querySelector('.label-error').remove()
            }

        }

        function createError(input) {
            input.classList.add('form-error')
            const parent = input.parentNode
            const errorLabel = document.createElement('label')
            errorLabel.textContent = 'Filed is required.'
            errorLabel.classList.add('label-error')
            parent.append(errorLabel)
        }

        let result = true
        const allInputs = form.querySelectorAll('input')
        for (const input of allInputs) {
            removeError(input)
            if (input.value == "") {
                createError(input)
                result = false
            }

        }

        const mess = document.querySelector('.status-of-form__mess')
        const messBox = mess.parentNode

        if (result) {
            mess.textContent = "Publish Complete!"
            if (messBox.classList.contains('status-of-form_error')) {
                messBox.classList.remove('status-of-form_error')
            }
            messBox.classList.add('status-of-form_correct')
        } else {
            mess.textContent = "Whoops! Some fields need your attention :o"
            if (messBox.classList.contains('status-of-form_correct')) {
                messBox.classList.remove('status-of-form_correct')
            }
            messBox.classList.add('status-of-form_error')
        }

        return result
    }

    function onPostFormSubmit(event) {
        event.preventDefault();
        let form = document.forms['postForm'];
        if (validation(form)) {
            var json = JSON.stringify(postData)
            fetch("api.php", {
                method: "POST",
                body: json
            }).then(function (response) {
                console.log('Data saved successfully.')
            }).catch(function(error) {
                console.log('An error occurred while saving.')
            })
        }
    }


    function initEventListener() {
        postForm.addEventListener('submit', onPostFormSubmit)
        titleInput.addEventListener('input', onTitleInputChange)
        subtitleInput.addEventListener('input', onSubtitleInputChange)
        authorInput.addEventListener('input', onAuthorInputChange)
        authorPhotoInput.addEventListener('change', onAuthorPhotoInputChange)
        datePostInput.addEventListener('input', onDatePostInputChange)
        mainpostImageInput.addEventListener('change', onMainPostImageInputChange)
        postImageInput.addEventListener('change', onPostImageInputChange)
        contentInput.addEventListener('change', onContentInputChange)

        
    }



    function invalidateTitlePreview() {
        const postArticlePreviewTitle = document.querySelector('.info__intro-title')
        postArticlePreviewTitle.innerText = postData.title;
        const postCardPreviewTitle = document.querySelector('.info__section-head')
        postCardPreviewTitle.innerText = postData.title;
    }

    function invalidateSubtitlePreview() {
        const postArticlePreviewSubtitle = document.querySelector('.info__intro-subtitle')
        postArticlePreviewSubtitle.innerText = postData.subtitle;
        const postCardPreviewSubtitle = document.querySelector('.info__section-subhead')
        postCardPreviewSubtitle.innerText = postData.subtitle;
    }

    function invalidateAuthorPreview() {
        const postPreviewAuthor = document.querySelector('.info__sign-autor')
        postPreviewAuthor.innerText = postData.authorName;
    }

    function invalidateAuthorPhotoPreview() {
        const postPreviewAuthorPhoto = document.querySelector('.info__round')
        postPreviewAuthorPhoto.src = postData.authorPhoto
        const postAuthorPhoto = document.querySelector('.info__avatar-preview')
        postAuthorPhoto.src = postData.authorPhoto
    }

    function invalidateDatePreview() {
        const postPreviewDate = document.querySelector('.info__sign-date')
        postPreviewDate.innerText = postData.datePost;
    }

    function invalidateMainImagePreview() {
        const postPreviewMainImage = document.querySelector('.info__images')
        postPreviewMainImage.src = postData.mainPostImage
        const postMainImage = document.querySelector('.info__image-preview-main')
        postMainImage.src = postData.mainPostImage
    }

    function invalidateImagePreview() {
        const postPreviewImage = document.querySelector('.info__imgs')
        postPreviewImage.src = postData.postImage
        const postImage = document.querySelector('.info__image-preview')
        postImage.src = postData.postImage
    }


    initEventListener();
    const date = document.getElementById('date_post_input');
    const datePreview = document.getElementById('sign-date');
    date.valueAsDate = new Date();
    datePreview.innerText = date.value;
    postData.datePost = date.value;


    document.querySelectorAll('.info__remove-button')[0].onclick = deleteImage;
    document.querySelectorAll('.info__remove-button')[1].onclick = deletePostMainImage;
    document.querySelectorAll('.info__remove-button')[2].onclick = deletePostImage;

    function deleteImage() {
        const postPreviewAuthorImage = document.querySelector('.info__avatar-preview')
        const postPreviewAuthorImage2 = document.querySelector('.info__round')
        postPreviewAuthorImage.src = "/images/avatar.png";
        postPreviewAuthorImage2.src = "/images/author.svg";
        document.querySelectorAll('.info__upload-new-button')[0].classList.remove('info__upload-new-button_download')
        document.querySelectorAll('.info__remove-button')[0].classList.remove('info__remove-button_download')
    }

    function deletePostMainImage() {
        const postPreviewAuthorImage = document.querySelector('.info__image-preview-main')
        const postPreviewAuthorImage2 = document.querySelector('.info__images')
        postPreviewAuthorImage.src = "/images/main-camera.png";
        postPreviewAuthorImage2.src = "/images/image.png";
        document.querySelectorAll('.info__upload-new-button')[1].classList.remove('info__upload-new-button_download')
        document.querySelectorAll('.info__remove-button')[1].classList.remove('info__remove-button_download')
        document.querySelectorAll('.indication-for-image')[0].classList.remove('indication-for-image_download')
    }

    function deletePostImage() {
        const postPreviewAuthorImage = document.querySelector('.info__image-preview')
        const postPreviewAuthorImage2 = document.querySelector('.info__imgs')
        postPreviewAuthorImage.src = "/images/camera-post.png";
        postPreviewAuthorImage2.src = "/images/image.png";
        document.querySelectorAll('.info__upload-new-button')[2].classList.remove('info__upload-new-button_download')
        document.querySelectorAll('.info__remove-button')[2].classList.remove('info__remove-button_download')
        document.querySelectorAll('.indication-for-image')[0].classList.remove('indication-for-image_download')
    }
});