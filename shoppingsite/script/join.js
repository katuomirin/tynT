new Vue ({
    el: '#app',
    data(){
        return{
            cord: ''
        };
    },
    computed:{
        isInValidCord(){
            const cord = this.cord;
            const isErr = cord.length != 7 || isNaN(Number(cord));
            return isErr;
        }
    }
});