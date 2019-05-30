
class Slider{
    constructor(slider){
        this.slider = slider;
        //slides contiene el array de hijos del primer hijo del slider
        this.slides = slider.children[0].children;
        this.max = this.slides.length;
        this.nav;
        this.dots;
        this.pos=0;
        this.init();
    }

    init(){
        this.nav = document.createElement("div");
        this.nav.className = "navbar";
        for (let i = 0; i < this.max; i++){
            this.nav.appendChild(this.newDot(i));
            this.slides[i].style.background = "#" + (Math.floor(Math.random() *899999)+100000);
        }
        this.slider.appendChild(this.nav);
        this.dots= this.nav.children;
        this.encender(this.slides[0]);
        this.encender(this.dots[0]);
    }

    avanzar(){
        this.apagar(this.slides[this.pos]);
        this.apagar(this.dots[this.pos]);
        setTimeout(function(){
            if(s.pos-1 > 0)s.slides[s.pos-1].classList.remove("hideSlide");
        },350);
        this.pos = this.pos<this.max-1?this.pos+1:0;
        this.encender(this.slides[this.pos]);
        this.encender(this.dots[this.pos]);
        s.resize(Math.floor(document.querySelector(".navbar").clientWidth/50));
    }
    retroceder(){
        this.apagar(this.slides[this.pos]);
        this.pos = this.pos>0?this.pos-1:this.max-1;
        this.encender(this.slides[this.pos]);
    }

    irAl(i){
        if(this.pos != i){
            this.apagar(this.slides[this.pos]);
            this.apagar(this.dots[this.pos]);
            this.pos = i;
            this.encender(this.slides[this.pos]);
            this.encender(this.dots[this.pos]);
        }
    }

    encender(e){
        e.classList.remove("hideSlide");
        e.classList.add("showSlide");
    }
    apagar(e){
        e.classList.remove("showSlide");
        e.classList.add("hideSlide");
    }

    newDot(e){
        var dot = document.createElement("div");
        dot.className = "dot";
        dot.appendChild(new Text(e+1));
        dot.addEventListener("click", () =>{
            this.irAl(e);
            this.resize(Math.floor(document.querySelector(".navbar").clientWidth/50))
        });
        return dot;
    }

    resize(i){
        for(var p = 0; p < this.max; p++)
            (p > this.pos-(i/2) && p < this.pos+(i/2))?
            this.dots[p].classList.remove("dspn"):
            this.dots[p].classList.add("dspn");
    }
}

let s;
window.onload = ()=>{
    s = new Slider(document.querySelector(".slider"));
    s.resize(Math.floor(document.querySelector(".navbar").clientWidth/50));
}
window.onresize =()=>s.resize(Math.floor(document.querySelector(".navbar").clientWidth/50));


setInterval(function(){
    s.avanzar();
},5500);
/*
resize(i){
    //console.log(i);
    for(var p = 0; p < this.max; p++)
        (p > this.pos-(i/2) && p < this.pos+(i/2))?
        this.dots[p].classList.remove("dspn"):
        this.dots[p].classList.add("dspn");
    
        /*if(p > this.pos-(i/2) && p < this.pos+(i/2)){
            this.dots[p].classList.remove("dspn");
        }
        else{
            this.dots[p].classList.add("dspn");
        }
}*/