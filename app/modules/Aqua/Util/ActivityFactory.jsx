import Question from '../QuestionActivity/QuestionActivity.jsx';
import OrderList from '../OrderListActivity/OrderListActivity.jsx';
import PairActivity from '../PairsActivity/PairActivity.jsx';
import ShearTransformation from '../ShearTransformation/ShearTransformationActivity.jsx';

const activities = { Question, OrderList, PairActivity, ShearTransformation };

export default function activityFactory (name) {
    return activities[name];
}