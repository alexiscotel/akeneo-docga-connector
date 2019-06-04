'use strict';

define([
    'pim/field',
    'underscore',
    'docga-extended-attribute-type/templates/product/field/docga',
], function (
    Field,
    _,
    fieldTemplate
) {
    return Field.extend({
        template: _.template(fieldTemplate),
        events: {
            'change .field-input:first input[type="range"]': 'updateModel'
        },
        renderInput: function (context) {
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
        updateModel: function () {
            var data = this.$('.field-input:first input[type="range"]').val();

            this.setCurrentValue(data);
        }
    });
}
);
