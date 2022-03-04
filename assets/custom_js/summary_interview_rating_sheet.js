$(document).ready(function () {
    function init() {

        $.get(`${baseUrl}Reports/getAllInterviews`, function (resp) {
            resp = JSON.parse(resp);

            let htmlString = '<tr>';

            resp.forEach(interview => {
                console.log(interview);
                let candidateInfo = JSON.parse(interview.applicant_info)[0];
                console.log(candidateInfo);
                let nameOfCandidate = `${candidateInfo.firstname} ${candidateInfo.middlename} ${candidateInfo.lastname}`;

                htmlString += `
                    <td>${nameOfCandidate}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                    <td>${interview}</td>
                `;
            });

            htmlString += "</tr>";
        });
    }

    init();
});