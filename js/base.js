function forceZeros(val, qtd){

  var str = "" + val;
  var pad = "0000000000000000000000000000000000000000000000000"
  var ans = pad.substring(0, qtd - str.length) + str;

  return ans;

}