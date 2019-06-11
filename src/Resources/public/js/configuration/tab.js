'use strict';

define([
    'underscore',
    'oro/translator',
    'routing',
    'pim/form',
    'docga-extended-attribute-type/configuration/tab-template'
    ],
    function (
        _,
        __,
        Routing,
        BaseForm,
        template
        ) {
        return BaseForm.extend({
            className: 'AknFormContainer AknFormContainer--withPadding',
            events: {
                'change .docga-config': 'updateModel'
            },
            isGroup: true,
            label: __('docga.configuration.tab'),
            template: _.template(template),

            configure: function () {
                this.trigger('tab:register', {
                    code: this.code,
                    isVisible: this.isVisible.bind(this),
                    label: this.label
                });

                return BaseForm.prototype.configure.apply(this, arguments);
            },
            render: function () {
                this.$el.html(this.template({
                    base_url: this.getFormData()['docga_extended_attribute_type___base_url'] ?
                        this.getFormData()['docga_extended_attribute_type___base_url'].value : '',
                    api_key: this.getFormData()['docga_extended_attribute_type___api_key'] ?
                        this.getFormData()['docga_extended_attribute_type___api_key'].value : '',
                    api_secret: this.getFormData()['docga_extended_attribute_type___api_secret'] ?
                        this.getFormData()['docga_extended_attribute_type___api_secret'].value : '',
                }));

                return this;
            },
            isVisible: function () {
                return true;
            },
            updateModel: function (event) {
                var data = this.getFormData();
                var element = $(event.target);
                if(!data[element.attr('id')]){
                    data[element.attr('id')] = {
                        scope:"app",
                        use_parent_scope_value:false,
                        value:null
                    }
                }
                data[element.attr('id')].value = element.val();
                this.setData(data);

            }
        });
    }
);