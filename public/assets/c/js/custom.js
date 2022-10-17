$(document).ready(function () {
    $('.button-submit').on('click', function (e) {
        var form = $(this).parents('form')
        e.preventDefault();
        Swal.fire({
            title: 'Do you want to delete this item?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                form.submit()
                // Swal.fire('Saved!', '', 'success')
            }
        })
    })
})

class MyUploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file
            .then(file => new Promise((resolve, reject) => {
                this._initRequest();
                this._initListeners(resolve, reject, file);
                this._sendRequest(file);
            }));
    }

    abort() {
        if (this.xhr) {
            this.xhr.abort();
        }
    }

    _initRequest() {
        const xhr = this.xhr = new XMLHttpRequest();

        xhr.open('POST', CKeditorUploadURL, true);
        xhr.responseType = 'json';
    }

    _initListeners(resolve, reject, file) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericErrorText = `Couldn't upload file: ${file.name}.`;

        xhr.addEventListener('error', () => reject(genericErrorText));
        xhr.addEventListener('abort', () => reject());
        xhr.addEventListener('load', () => {
            const response = xhr.response;

            if (!response || response.error) {
                return reject(response && response.error ? response.error.message : genericErrorText);
            }

            resolve(response);
        });

        if (xhr.upload) {
            xhr.upload.addEventListener('progress', evt => {
                if (evt.lengthComputable) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            });
        }
    }

    _sendRequest(file) {
        const data = new FormData();

        data.append('upload', file);

        this.xhr.send(data);
    }
}

function MyCustomUploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        return new MyUploadAdapter(loader);
    };
}

ClassicEditor
    .create(document.querySelector('#editor'), {
        extraPlugins: [MyCustomUploadAdapterPlugin],
        image: {
            toolbar: ['toggleImageCaption', 'imageTextAlternative', {
                // Grouping the buttons for the regular
                // picture-like image styling into one drop-down.
                name: 'imageStyle:pictures',
                items: ['imageStyle:inline', 'imageStyle:side', 'imageStyle:alignLeft'],
                defaultItem: 'imageStyle:inline'
            }],
        }
    })
    .catch(error => {
        console.error(error);
    });