let observedEvents = document.getElementById('observedEvents');
let observedText = document.getElementById('observedText');
let createdEvents = document.getElementById('createdEvents');
let createdText = document.getElementById('createdText');
let previousTab = 0;

function changeTab(i) {
    if (i === previousTab) {
        return;
    }
    if (i === 0) {
        observedEvents.classList.remove("hidden", "opacity-0");
        observedEvents.classList.add("opacity-100");
        observedText.classList.remove("text-sm", "text-black", "text-opacity-70");
        observedText.classList.add("text-2xl");

        createdEvents.classList.remove("opacity-100");
        createdEvents.classList.add("hidden", "opacity-0");
        createdText.classList.remove("text-2xl");
        createdText.classList.add("text-sm", "text-black", "text-opacity-70");
    }
    else if (i === 1) {
        observedEvents.classList.remove("opacity-100");
        observedEvents.classList.add("hidden", "opacity-0");
        observedText.classList.remove("text-2xl");
        observedText.classList.add("text-sm", "text-black", "text-opacity-70");

        createdEvents.classList.remove("hidden", "opacity-0")
        createdEvents.classList.add("opacity-100");
        createdText.classList.remove("text-sm", "text-black", "text-opacity-70");
        createdText.classList.add("text-2xl");
    }
    previousTab = i;
}
