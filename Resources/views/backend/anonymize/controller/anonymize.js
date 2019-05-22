
Ext.define('Shopware.apps.Anonymize.controller.Anonymize', {

    extend: 'Enlight.app.Controller',

    anonymize: function() {
        var me = this,
            action = me.subApplication.action;

        Ext.Ajax.request({
            url: '{url controller=Anonymize action=anonymize}',
            success: function(response) {
                var responseObj = Ext.JSON.decode(response.responseText),
                    message;
                if (responseObj.success) {
                    message = 'success';
                } else {
                    message = responseObj.message;
                }

                Shopware.Notification.createGrowlMessage(
                    'title',
                    message
                );

                me.subApplication.handleSubAppDestroy(null);
            }
        });
    }
});