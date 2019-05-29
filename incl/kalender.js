/* kalender */

window.onload=init;

function init()
{
  datePickerController.createDatePicker
  (
    {
      formElements:
        {
          "lfrist":"%Y-%m-%d"
        }
    }
  );
  datePickerController.createDatePicker
  (
    {
      formElements:
        {
          "nlfrist":"%Y-%m-%d"
        }
    }
  );
}
