Blockly.Blocks['field'] = {
  init: function() {
    this.setColour(75);
    this.appendDummyInput()
        .appendField("Field");
    this.appendDummyInput("name")
        .appendField("Name")
        .appendField(new Blockly.FieldTextInput(""), "name");

    this.appendDummyInput("type")
        .appendField("Type")
        .appendField(new Blockly.FieldDropdown([['Text', 'Text'], 
                                                ['Rich Text', 'Richtext'],
                                                ['Date', 'Date'],
                                                ['Blockly', 'Blockly']
]),"type" );
    this.appendValueInput("title")
        .appendField("Title");
    this.setPreviousStatement(true);
    this.setNextStatement(true);
    this.setTooltip('');
  }
};

