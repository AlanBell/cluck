Blockly.Blocks['panel'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()
        .appendField("Panel");
    this.appendValueInput("title")
        .appendField("Title");
    this.appendStatementInput("body")
        .appendField("Body");
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};

