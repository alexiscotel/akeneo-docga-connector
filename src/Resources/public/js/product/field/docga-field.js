'use strict';

define([
    'pim/field',
    'underscore'
], function (
    Field,
    _,
    fieldTemplate
) {
    return Field.extend({
        fieldTemplate: _.template(fieldTemplate),
        events: {
            'change .field-input:first input[type="range"]': 'updateModel'
        },
        renderInput: function (context) {
            this.$el.html('<div>Coucou</div>')
            return this;
        },
        updateModel: function () {
            var data = this.$('.field-input:first input[type="range"]').val();

            this.setCurrentValue(data);
        }
    });
}
);
