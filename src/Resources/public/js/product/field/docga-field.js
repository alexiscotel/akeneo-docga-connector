'use strict';

define([
    'pim/field',
    'underscore',
    'docga-extended-attribute-type/templates/product/field/docga',
    'docga-extended-attribute-type/docga-api'
], function (
    Field,
    _,
    fieldTemplate,
    DocGaAPI
) {
    return Field.extend({
        fieldTemplate: _.template(fieldTemplate),
        events: {
            'click .add-file': 'selectFile',
            'click .remove-file': 'removeFile'
        },
        renderInput: function (context) {
            console.log('CONTEXT', context)
            // Loads assets
            this.assets = context.value.data ? JSON.parse(context.value.data) : [];

            return this.fieldTemplate({
                id : this.attribute.id,
                assets : this.assets
            })
            // return this.fieldTemplate;
        },
        /**
         * Initialization
         *
         * @param
         */
        initialize: function (attribute) {

            this.docgaApi = new DocGaAPI.default('https://docga.plateforme-services.com/', 'z3nxi58ewx8jfods50xi2xap', 'lre4jv3nj0')
            this.docgaApi.setCallbackFilesSelected(this.callbackFilesSelected.bind(this))

            return Field.prototype.initialize.apply(this, arguments);
            /*$.getJSON(
              Routing.generate('oniti_docga_get_config'),
              function(config) {
                  var check = (
                    typeof config === 'object' &&
                    typeof config.baseurl === 'string' && config.baseurl.length &&
                    typeof config.api_key === 'string' && config.api_key.length &&
                    typeof config.api_secret === 'string' && config.api_secret.length
                  );

                  if(!check) {
                      alert(_.__('docga.field.an_error_has_occurred'));
                      return;
                  }
                  this.docgaApi = new DocGaAPI(config.baseurl, config.api_key, config.api_secret)
                  this.docgaApi.setCallbackFilesSelected(this.callbackFilesSelected.bind(this))

              }.bind(this)
            );*/
        },
        callbackFilesSelected: function (files){
            var self = this;
            var key_map = {
                tags:'relation',
                download:'file',
                force_download:'downloadfile',
                original_name:'name',
                thumbnail:'thumbnail',
                slug:'slug',
                title:'title'
            }

            var key_allowed = Object.keys(key_map);

            files.forEach(function(json){
                var data_parsed = Object.keys(json).reduce(function(prev,key){
                    if(key_allowed.indexOf(key) > -1){
                        let ret = Object.assign(prev,{})
                        ret[key_map[key]] = json[key]
                        return ret
                    } else return prev
                },{})
                self.assets.push(data_parsed)
            })
            this.updateModel();
            this.render();
        },
        getSlug: function (event) {
            var el = event.currentTarget || event.srcElement;
            var data = el.id.split('-')
            data.shift()
            return data.join('-').split('.')[0];
        },
        selectFile: function(){
            this.docgaApi.open()
        },
        /**
         * Supprime un fichier
         * @param  {[type]} event [description]
         * @return {[type]}       [description]
         */
        removeFile: function(event){
            var slug = this.getSlug(event)
            this.assets = this.assets.filter(function(doc){
                return doc.slug !== slug;
            })
            this.updateField();
        },
        updateModel: function () {
            var data = this.assets && this.assets.length ? JSON.stringify(this.assets) : null;
            this.setCurrentValue(data);
        }
    });
}
);
