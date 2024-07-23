const example2 = new autoComplete({
    selector: "#example2",
    placeHolder: "Search for opinion",
    resultItem: {
        highlight: {
            render: true
        }
    },
    events: {
        input: {
        focus() {
            if (example2.input.value.length) example2.start();
        },
        selection(event) {
            const feedback = event.detail;
            // Prepare User's Selected Value
            const selection = feedback.selection.value;

            // Replace Input value with the selected value
            example2.input.value = selection;
        },
        },
    },
});
