import Question from '../QuestionActivity/QuestionActivity.jsx';
import OrderList from '../OrderListActivity/OrderListActivity.jsx';
import NumeracyQuestion from '../NumeracyQuestionActivity/NumeracyQuestionActivity.jsx';
import PairActivity from '../PairsActivity/PairActivity.jsx';
import Anagram from '../Anagrams/Anagram.jsx';
import WordSearch from '../WordSearch/WordSearch.jsx';
import ShearTransformation from '../ShearTransformation/ShearTransformationActivity.jsx';

const activities = { Question, OrderList, PairActivity, ShearTransformation, NumeracyQuestion, Anagram , WordSearch };

export default function activityFactory (name) {
    return activities[name];
}