Blockly.Blocks['button group'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()
        .appendField("Button Group");
    this.appendStatementInput("buttons");
    this.setTooltip('');
    this.setPreviousStatement(true);
    this.setNextStatement(true);

  }
};


