const faqs=document.querySelectorAll(".faq");

faqs.forEach((faq) => {
    faq.addEventListener("click", () => { 
        faq.classList.toggle("active");
    });
});


function ammortisation(event) 
{
    event.preventDefault();

    var loanAmount = parseFloat(document.getElementById("loanAmount").value);
    var term = parseInt(document.getElementById("term").value);
    var interestRate = parseFloat(document.getElementById("interestRate").value);


    var monthlyInterestRate = interestRate / 100 / 12;
    var numPayments = term * 12;
    var monthlyPayment = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -numPayments));

    var resultElement = document.getElementById("result");
    resultElement.textContent = "€" + monthlyPayment.toFixed(2);

    var resultElement2=document.getElementById("result2");
    resultElement2.textContent= "€" + (monthlyPayment*(term*12)).toFixed(2);
};

document.getElementById("loanForm").addEventListener("submit", ammortisation); 



