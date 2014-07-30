Blockly.Blocks['button'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()
        .appendField("Button");
    this.appendValueInput("title")
        .appendField("Title");
    this.appendValueInput("action")
        .appendField("Action");
    this.setTooltip('');
    this.setPreviousStatement(true);
    this.setNextStatement(true);

  }
};


