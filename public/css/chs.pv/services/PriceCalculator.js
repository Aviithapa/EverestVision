export default class PriceCalculator  {

  getPriceForPax(price, pax) {

    let netTotal = 0
    let mappedPrices = {}
    let prices = []
    let paxes = []
    let i = 0
    price.group_prices.forEach(price => {
      paxes.push(price.quantity)
      mappedPrices[price.quantity] = price.price
      i++;
    })

    paxes.sort((a, b) => b-a)
    paxes.forEach(pax => {
      prices.push(mappedPrices[pax])
    })

    let remainingPax = pax
    for (i = 0; i < paxes.length; i++){
      let batch = remainingPax /  paxes[i]
      remainingPax = remainingPax % paxes[i];
      netTotal += (prices[i] * ( Math.floor(batch)));
      if(remainingPax === 0){
        return netTotal;
      }
    }

    return 0
  }
}
