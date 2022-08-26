const sort = document.querySelector("#sort");
sort.addEventListener(EventNames.CHANGE, sortChangeHandler);

function sortChangeHandler(evt){
    window.location.href = "index.php?page=movies&sort=" + sort.value;
}

class AbstractSection extends EventTarget{

    constructor(sectionDiv){
        super();
        this.sectionDiv = sectionDiv;
    }

    init(){
        this.dispatchEvent(new CustomEvent(EventNames.INIT));
    }

}

class MovieSection extends AbstractSection {

    constructor(sectionDiv){
        super(sectionDiv);
    }

}

class ProgressBar extends AbstractUIComponent{

    constructor(UIView, disableColor = "#CCCCCC"){
        super(UIView);
        this.disableColor = disableColor;
        this.valueComponent = this.UIView.getAttribute("data-attr");
        this.intervalID;
        this.timer = 0;
    }

    start(){
        if(super.value != -1){
            this.intervalID = setInterval(progress, 20);
        }
    }

    stop(){

    }

    progress(){
        const limit = 1000;
        const percent = Math.round(this.timer / limit * 100);
        this.timer += 50;
        const progressBarDiv = this.UIView.querySelector("#progressBar");
        progressBarDiv.setAttribute("style", "width:" + percent.toString() + "%");
        
    }

}