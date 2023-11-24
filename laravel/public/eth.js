import Web3 from 'web3/dist/web3.min.js'

window.web3 = new Web3

if(!window.ethereum){
    alert("Install metamask extension")
    return ;
}

const web3 = new Web3(window.ethereum)