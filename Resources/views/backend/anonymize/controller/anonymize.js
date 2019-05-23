//{namespace name="index"}
Ext.define('Shopware.apps.Anonymize.controller.Anonymize', {

    extend: 'Enlight.app.Controller',

    anonymize: function () {
        var me = this,
            action = me.subApplication.action;

        Ext.MessageBox.confirm('{s name=anonymize}Anonymize{/s}', '{s name=confirmation}Are you sure? Data in db will be anonymized.{/s}', function (response) {
            if (response !== 'yes') {
                return;
            }
            Ext.Ajax.request({
                url: '{url controller=Anonymize action=anonymize}',
                success: function (response) {
                    var responseObj = Ext.JSON.decode(response.responseText),
                        message;
                    if (responseObj.success) {
                        message = '{s name=startedAt}Anonymization started at{/s} ' + responseObj.datetime;
                    } else {
                        message = responseObj.message;
                    }

                    Shopware.Notification.createGrowlMessage(
                        '{s name=anonymize}Anonymization{/s}',
                        message
                    );

                    me.subApplication.handleSubAppDestroy(null);
                }
            });
        });
    }
});