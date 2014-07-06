
Blockly.Blocks['iterate'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()
        .appendField("Iterate");
    this.appendValueInput("collection")
        .appendField("Collection");
    this.appendValueInput("find")
        .appendField("Find Query");
    this.appendValueInput("sort")
        .appendField("Sort");
    this.appendValueInput("direction")
        .appendField("Direction");
    this.appendValueInput("limit")
        .appendField("Limit");
    this.appendStatementInput("content");
    this.setTooltip('');
    this.setPreviousStatement(true);
    this.setNextStatement(true);

  }
};


