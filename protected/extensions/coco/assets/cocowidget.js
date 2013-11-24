var CocoWidget = function(options) {

	this.nocache = function(){
		var dateObject = new Date();
		var uuid = dateObject.getTime();
		return "&nocache="+uuid;
	}

	this.onComplete = function(id, fileName, responseJSON){
		//$('#'+options.loggerid).append('<p>Completed:'+fileName+'</p>');
		if(options.onCompleted != null)
			options.onCompleted(id, fileName, responseJSON);

	}

	this.onCancel = function(id, fileName){
		//$('#'+options.loggerid).append('<p>Cancelled: '+fileName+'</p>');
		if(options.onCancelled != null)
			options.onCancelled(id, fileName);
	}

	this.showMessage = function(messageText){
		//$('#'+options.loggerid).append('<p>'+messageText+'</p>');
		if(options.onMessage != null)
			options.onMessage(messageText);

	}

	this.run = function(){
		var _this = this;
		var _uploader = new qq.FileUploader({
			buttonText: options.buttonText,
			dropFilesText: options.dropFilesText,
			element: document.getElementById(options.uploaderContainer),
			action: options.action + '&action=upload' + _this.nocache() + '&data='+options.data,
			onComplete: _this.onComplete,
			onCancel: _this.onCancel,
			showMessage: _this.showMessage
		});
	}

}
