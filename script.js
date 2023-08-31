$(document).ready(function(){
    const stages = $(".stage");
    const nextButtons = $(".next-btn");
    const prevButtons = $(".prev-btn");
    const progressBar = $(".progress-bar");
    const stageColors = ["#FF0000", "#FFFF00", "#00FF00"];

    let currentStage = 0;
    function showStage(index){
        stages.hide();
        stages.eq(index).show();
        currentStage = index;
        if(currentStage===0){
            prevButtons.hide();
        }
        else if(currentStage === stages.length - 1){
            nextButtons.hide();
        }
        else {
            prevButtons.show();
            nextButtons.show();
        }
        updateProgressBar();
    }
    function updateProgressBar() {
        const progress = ((currentStage + 1) / stages.length) * 100;
        progressBar.css("width", progress + "%");
        progressBar.attr("aria-valuenow", progress);
        progressBar.css("background-color", stageColors[currentStage]);
    }
    nextButtons.click(function(event){
        event.preventDefault();
        showStage(currentStage + 1);
    });
    prevButtons.click(function(event){
        event.preventDefault();
        showStage(currentStage - 1);
    });
    showStage(currentStage);
});