Blockly.Blocks['menu item'] = {
  init: function() {
    this.setColour(20);
    this.appendDummyInput()  
        .appendField("Menu item");
    this.appendValueInput("title")                                                                                                                                                         
        .appendField("Title");
    this.appendValueInput("action")
        .appendField("Action");
    this.setPreviousStatement(true);
    this.setNextStatement(true); 
    this.setTooltip('');
  }
};

