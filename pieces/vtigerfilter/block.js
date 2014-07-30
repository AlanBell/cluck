Blockly.Blocks['vtigerfilter'] = {
  init: function() {
    this.setHelpUrl('http://www.example.com/');
    this.setColour(230);
    this.appendDummyInput()
        .appendField('Filter');
    this.appendDummyInput()
        .appendField('Name')
        .appendField(new Blockly.FieldTextInput("All"), "name");
    this.appendDummyInput()
        .appendField('isdefault')
        .appendField(new Blockly.FieldCheckbox("TRUE"), "isdefault");
    this.appendStatementInput("fields")
        .appendField('Field Names');

    this.setInputsInline(false);

    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};


