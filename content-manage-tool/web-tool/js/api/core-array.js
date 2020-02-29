class CoreArray {
   uniqueDataStorage(arry,arryData){
    var uniqueData = arryData.filter(function(obj) { return arry.indexOf(obj) == -1; });
	for(var index=0;index<uniqueData.length;index++){ arry.push(uniqueData[index]); }
  }
}
coreArray = new CoreArray();