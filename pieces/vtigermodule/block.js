Blockly.Blocks['vtigermodule'] = {
  init: function() {
    this.setHelpUrl('http://www.example.com/');
    this.setColour(140);
    this.appendDummyInput()
        .appendField('Module');
    this.appendDummyInput()
        .appendField('Name')
        .appendField(new Blockly.FieldTextInput(""), "modulename");
    this.appendDummyInput()
        .appendField('Parent')
        .appendField(new Blockly.FieldTextInput(""), "parent");
    this.appendStatementInput("Blocks")
        .appendField('Blocks');

    this.setInputsInline(false);

    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};


