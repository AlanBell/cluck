Blockly.Blocks['calendar'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()
        .appendField("Calendar");
    this.appendValueInput("start")
        .appendField("Start Fieldname");
    this.appendValueInput("start")
        .appendField("End Fieldname");
    this.appendStatementInput("Fields")
        .appendField("Display");
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};

