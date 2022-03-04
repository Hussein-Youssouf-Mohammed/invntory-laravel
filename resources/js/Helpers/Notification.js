class Notification {

    success() {
        new Noty({
            type: 'success',
            text: 'Succssfully Done',
            timeout: 1000,
            layout: 'topRight'
        }).show();
    }

    error() {
        new Noty({
            type: 'error',
            text: 'Something went wrong',
            timeout: 1000,
            layout: 'topRight'
        }).show();
    }

    alert(){
        new Noty ({
            type: 'alert',
            text: 'Are You Sure ?',
            timeout: 1000,
            layout: 'topRight'
        }).show();
    }

    image_validation() {
        new Noty ({
            type: 'error',
            text: 'Upload Image less then 1MB',
            timeout: 1000,
            layout: 'topRight'
        }).show();
    }
}

export default Notification  = new Notification()