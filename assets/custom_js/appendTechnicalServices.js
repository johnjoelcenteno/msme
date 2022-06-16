let servicesProvidedArray = [];

function getTechnicalServiceInputs() {
    const technicalAdvisory = $('#technicalAdvisory').val();
    const dateOfServicesStarted = $('#dateOfServicesStarted').val();
    const dateOfServicesEnded = $('#dateOfServicesEnded').val();

    return { technicalAdvisory, dateOfServicesStarted, dateOfServicesEnded };
}

function validateTechnicalServicesProvided() {
    const technicalAdvisory = $('#technicalAdvisory');
    const dateOfServicesStarted = $('#dateOfServicesStarted');
    const dateOfServicesEnded = $('#dateOfServicesEnded');

    const inputHodler = [technicalAdvisory.val(), dateOfServicesEnded.val(), dateOfServicesStarted.val()];

    // give validation errors
    technicalAdvisory.val() == "" ? $('#errorTechnical').show() : $('#errorTechnical').hide();
    dateOfServicesStarted.val() == "" ? $('#dateStartedError').show() : $('#dateStartedError').hide();
    dateOfServicesEnded.val() == "" ? $('#dateEndedError').show() : $('#dateEndedError').hide();

    return inputHodler.some(x => x != "");
}

function renderServicesProvidedArray() {
    let htmlTableData = ``;

    let counter = 0;
    servicesProvidedArray.forEach(x => {
        counter++;
        htmlTableData += `
            <tr>
                <td>${counter}</td>
                <td>${x.technicalAdvisory}</td>
                <td>${x.dateOfServicesStarted}</td>
                <td>${x.dateOfServicesEnded}</td>
                <td>
                    <button class="btn btn-danger btn-sm remove" value="${x.technicalAdvisory}" type="button">Remove</button>
                </td>
            </tr>
        `;
    });

    $('.tbodyServicesProvided').html(htmlTableData);
}

function resetServicesProvidedInputs() {
    $('#technicalAdvisory').val("");
    $('#dateOfServicesStarted').val("");
    $('#dateOfServicesEnded').val("");
}

$(document).on('click', '.remove', function () {
    let selectedTechnicalService = $(this).val();
    servicesProvidedArray = servicesProvidedArray.filter(x => x.technicalAdvisory != selectedTechnicalService);
    renderServicesProvidedArray();
});

$('#appendBtn').click(function () {
    if (!validateTechnicalServicesProvided()) return;

    servicesProvidedArray.push(getTechnicalServiceInputs());
    renderServicesProvidedArray();
    resetServicesProvidedInputs();
});
