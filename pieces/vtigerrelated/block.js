Blockly.Blocks['vtigerrelated'] = {
  init: function() {
    this.setColour(250);
    this.appendDummyInput()
        .appendField('Related List');
    this.appendDummyInput()
        .appendField('Title')
        .appendField(new Blockly.FieldTextInput(""), "title");
    this.appendDummyInput()
        .appendField('othermodule')
        .appendField(new Blockly.FieldTextInput(""), "Related Module");

    this.setInputsInline(false);

    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};


