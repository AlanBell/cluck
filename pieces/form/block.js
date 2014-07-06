Blockly.Blocks['form'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()
        .appendField("Form");                                                                                                                                                              
    this.appendStatementInput("content")
        .appendField("Fields");
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};

