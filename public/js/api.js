let majid = {};
let prices = "http://api.coinlayer.com/api/live?access_key=a5a17013393662a885e8d738d00dc26b&symbols=BTC,ETH,BNB,XRP,BCH,XMR,ZEC,NEO";
const getData = async () => {
    try {
        const {data} = await axios(prices);
        majid = {...data.rates};
        document.querySelector("#BTC").textContent = `BTC : $${majid.BTC.toFixed(2)}`;
        document.querySelector("#ETH").textContent = `ETH : $${majid.ETH.toFixed(2)}`;
        document.querySelector("#BNB").textContent = `BNB : $${majid.BNB.toFixed(2)}`;
        document.querySelector("#XRP").textContent = `XRP : $${majid.XRP.toFixed(2)}`;
        document.querySelector("#BCH").textContent = `BCH : $${majid.BCH.toFixed(2)}`;
        document.querySelector("#XMR").textContent = `XMR : $${majid.XMR.toFixed(2)}`;
        document.querySelector("#ZEC").textContent = `ZEC : $${majid.ZEC.toFixed(2)}`;
        document.querySelector("#NEO").textContent = `NEO : $${majid.NEO.toFixed(2)}`;

    } catch (error) {
        alert("خطایی رخ داده  " + error.message);
    }
}
getData();

setInterval(getData, 300000);





