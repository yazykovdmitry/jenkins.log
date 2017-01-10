BX.ready(function(){

    //  Обработка разворачивания блока с файлами
    BX.bindDelegate(
        document.body, 'click', {className: 'show' },
        function(e){
            if(!e) {
                e = window.event;
            }
            //  Родитель
            var hiddenDOM = BX.findParent(this, {"tag" : "div"});
            //  Переключение классов со стилями
            BX.toggleClass(hiddenDOM, ["hidden", "visible"]);

            return BX.PreventDefault(e);
        }
    );
});