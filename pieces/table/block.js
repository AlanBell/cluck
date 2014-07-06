Blockly.Blocks['table'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()
        .appendField("Table");
    this.appendValueInput("collection")
        .appendField("Collection");
    this.appendValueInput("find")
        .appendField("Find");
    this.appendValueInput("sort")
        .appendField("Sort");
    this.appendStatementInput("content")
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};

