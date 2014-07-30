Blockly.Blocks['vtigerblock'] = {
  init: function() {
    this.setHelpUrl('http://www.example.com/');
    this.setColour(230);
    this.appendDummyInput()
        .appendField('Block');
    this.appendDummyInput()
        .appendField('Name')
        .appendField(new Blockly.FieldTextInput(""), "blockname");
    this.appendStatementInput("Fields")
        .appendField('Fields');

    this.setInputsInline(false);

    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};


