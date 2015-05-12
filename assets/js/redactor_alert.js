if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};
RedactorPlugins.ec_redactor_plugin_sample_alert = function() {
    return {
        init: function()
        {
            alert('ExchangeCore Redactor Plugin Initialized!');
        }
    };
};