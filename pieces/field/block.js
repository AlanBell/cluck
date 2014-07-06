Blockly.Blocks['field'] = {
  init: function() {
    this.setColour(75);
    this.appendDummyInput()
        .appendField("Field");
    this.appendValueInput("name")
        .appendField("Name");
    this.appendValueInput("type")
        .appendField("Type");
    this.appendValueInput("title")
        .appendField("Title");
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};

