Blockly.Blocks['query'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()
        .appendField("Query");
    this.appendValueInput("collection")
        .appendField("Collection");
    this.appendValueInput("criteria")
        .appendField("Criteria");
    this.appendValueInput("projection")
        .appendField("Projection");
    this.appendValueInput("sort")
        .appendField("Sort");
    this.appendValueInput("limit")
        .appendField("Limit");
    this.appendStatementInput("content")
        .appendField("Content");
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};

