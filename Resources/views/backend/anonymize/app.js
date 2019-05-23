
Ext.define('Shopware.apps.Anonymize', {

    extend: 'Enlight.app.SubApplication',

    name: 'Shopware.apps.Anonymize',

    loadPath: '{url action=load}',

    controllers: [
        'Anonymize'
    ],

    launch: function () {
        var me = this;
        me.getController('Anonymize').anonymize();
    }

});